<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Alertes Controller
 *
 * @property \App\Model\Table\AlertesTable $Alertes
 */
class AlertesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Charge le FlashComponent
    }
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $alertes = $this->paginate($this->Alertes->find('all')->where(['liste' => 0])->order(['id'=>'DESC']));

        $this->set(compact('alertes'));
        $this->set('_serialize', ['alertes']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alerte = $this->Alertes->newEntity();
		
		$alertes = $this->Alertes->find('all')
									->distinct(['list'])
									->where(['liste'=>1,'date_envoi >'=>date('Y-m-d H:i:s')])
									->order(['date_envoi'=>'ASC']);
		
		$alerte->liste = 0;
		
        if ($this->request->is('post')) {
		
            $alerte = $this->Alertes->patchEntity($alerte, $this->request->data);

			$alerte->list = str_replace('.','',$alerte->list);
			$alerte->list = str_replace(' ','',$alerte->list);
			
			if( ! $alerte->liste ){
				$alerte->success  = $this->send( $alerte ) ? 1 : 0;
			}
			
			if ($this->Alertes->save($alerte)) {
				
				$this->Flash->success(__('The alerte has been saved.'));
				return $this->redirect(['action' => 'index']);
				
			} else {
				$this->Flash->error(__('The alerte could not be saved. Please, try again.'));
			}

        }

        $this->set(compact('alerte','alertes'));
        $this->set('_serialize', ['alerte']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function liste()
    {
        $alerte = $this->Alertes->newEntity();
		
		$alertes = $this->Alertes->find('all')
									->distinct(['list'])
									->where(['liste'=>1,'date_envoi >'=>date('Y-m-d H:i:s')])
									->order(['date_envoi'=>'ASC']);
		$alerte->liste = 1;
		
        if ($this->request->is('post')) {
		
            $alerte = $this->Alertes->patchEntity($alerte, $this->request->data);

			$alerte->list = str_replace('.','',$alerte->list);
			$alerte->list = str_replace(' ','',$alerte->list);

			if ($this->Alertes->save($alerte)) {
				
				$this->Flash->success(__('The alerte has been saved.'));
				return $this->redirect(['action' => 'index']);
				
			} else {
				$this->Flash->error(__('The alerte could not be saved. Please, try again.'));
			}

        }

        $this->set(compact('alerte','alertes'));
        $this->set('_serialize', ['alerte']);
    }
	
	public function resend( $id = null )
	{
		$this->autoRender = false;
		
		$alerte = $this->Alertes->get($id);

		if( $alerte ){	
			$this->send( $alerte );
		}
		
		return $this->redirect(['action' => 'index']);
		
	}
	
	public function send( $alerte )
	{
	
		$this->ovh_base_url = "https://eu.api.ovh.com/1.0";
		
		$this->ovh_application_key = 'dizkHnq6IRmOoKbH';
		$this->ovh_application_secret = 'pcUF9aPGxFviMPRZAJOMAiWVCukWlcWk';
		$this->ovh_consumer_key = 'P13go5Jtxp1rlgME15Pgy5i2qt2VvLA7';
		$this->ovh_contrat = 'sms-rj46741-1';
		$this->ovh_end_point = 'ovh-eu';
		$this->ovh_rights = 'SECOURS88';
		
		$this->method = 'POST';
		$this->ovh_time_drift = 0;

		if( empty( $this->ovh_consumer_key ) || $this->ovh_consumer_key == '-' ) {
			$this->getCredential();
		}
		
        $url = $this->ovh_base_url . '/sms/'.$this->ovh_contrat.'/jobs/';

		// TODO :: A refaire le remplacement du retour chariot
		$alerte->destinataires = explode('
',$alerte->list);
		$alerte->destinataires = '+'.implode(',+',$alerte->destinataires);
		$alerte->destinataires = str_replace('.','',$alerte->destinataires);
		$alerte->destinataires = str_replace(' ','',$alerte->destinataires);
		$alerte->destinataires = str_replace('+0','+33',$alerte->destinataires);
			
		$msg = array(
			"charset"=> "UTF-8",
			"class"=> "phoneDisplay",
			"coding"=> "7bit",
			"message"=> $alerte->message,
			"noStopClause"=> true,
			"priority"=> "high",
			"receivers"=> (array)$alerte->destinataires,
			"sender"=>"SECOURS88",
			"senderForResponse"=> false,
			"validityPeriod"=> 2880
		);

        if( $msg ){
           $msg = json_encode($msg);
        } else {
           $msg = "";
        }

        $server_time_request = file_get_contents( $this->ovh_base_url . '/auth/time');
		
        if($server_time_request !== FALSE) {
            $this->ovh_time_drift = time() - (int) $server_time_request;
        }
		
        $time = time() - $this->ovh_time_drift;

        $signatures = $this->ovh_application_secret.'+'.$this->ovh_consumer_key.'+'.$this->method.'+'.$url.'+'.$msg.'+'.$time;
		$signature = "$1$" . sha1($signatures);

        // Call
        $curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json; charset=utf-8',
            'X-Ovh-Application:' . $this->ovh_application_key,
            'X-Ovh-Consumer:' . $this->ovh_consumer_key,
            'X-Ovh-Signature:' . $signature,
            'X-Ovh-Timestamp:' . $time
        ));

        if($msg)  {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $msg);
        }
		
        $result = curl_exec($curl);

		$retVal = 1;
		
        if($result === FALSE){
			$retVal = 0;
			$this->Flash->error(curl_error($curl));
        } else {
			$this->Flash->error($result);
			$retVal = 1;
		}
		
		$this->Flash->success(__('SMS bien envoyé(s).'));

		return $retVal;
		
	}
		
	public function answer()
	{
	
		$this->ovh_base_url = "https://eu.api.ovh.com/1.0";
		
		$this->ovh_application_key = 'dizkHnq6IRmOoKbH';
		$this->ovh_application_secret = 'pcUF9aPGxFviMPRZAJOMAiWVCukWlcWk';
		$this->ovh_consumer_key = 'P13go5Jtxp1rlgME15Pgy5i2qt2VvLA7';
		$this->ovh_contrat = 'sms-rj46741-1';
		$this->ovh_end_point = 'ovh-eu';
		$this->ovh_rights = 'SECOURS88';
		
		$this->method = 'GET';
		$this->ovh_time_drift = 0;

		if( empty( $this->ovh_consumer_key ) || $this->ovh_consumer_key == '-' ) {
			$this->getCredential();
		}
		
        $url = $this->ovh_base_url . '/sms/'.$this->ovh_contrat.'/incoming/';
		
		$msg = array(
			"charset"=> "UTF-8",
			"class"=> "phoneDisplay",
			"coding"=> "7bit",
			"message"=> $alerte->message,
			"noStopClause"=> true,
			"priority"=> "high",
			"receivers"=> (array)$alerte->destinataires,
			"sender"=>"SECOURS88",
			"senderForResponse"=> false,
			"validityPeriod"=> 2880
		);

        if( $msg ){
           $msg = json_encode($msg);
        } else {
           $msg = "";
        }

        $server_time_request = file_get_contents( $this->ovh_base_url . '/auth/time');
		
        if($server_time_request !== FALSE) {
            $this->ovh_time_drift = time() - (int) $server_time_request;
        }
		
        $time = time() - $this->ovh_time_drift;

        $signatures = $this->ovh_application_secret.'+'.$this->ovh_consumer_key.'+'.$this->method.'+'.$url.'+'.$msg.'+'.$time;
		$signature = "$1$" . sha1($signatures);

        // Call
        $curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json; charset=utf-8',
            'X-Ovh-Application:' . $this->ovh_application_key,
            'X-Ovh-Consumer:' . $this->ovh_consumer_key,
            'X-Ovh-Signature:' . $signature,
            'X-Ovh-Timestamp:' . $time
        ));

        if($msg)  {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $msg);
        }
		
        $result = curl_exec($curl);

		$retVal = 1;
		
        if($result === FALSE){
			$retVal = 0;
			$this->Flash->error(curl_error($curl));
        } else {
			$this->Flash->error($result);
			$retVal = 1;
		}
		
		$this->Flash->success(__('SMS bien envoyé(s).'));

		return $retVal;
		
	}		

//    /**
//     * Edit method
//     *
//     * @param string|null $id Alerte id.
//     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
//     * @throws \Cake\Network\Exception\NotFoundException When record not found.
//     */
//    public function edit($id = null)
//    {
//        $alerte = $this->Alertes->get($id);
//		
//		$alerte->message = '';
//		$alerte->success = '';
//
//        $newsms = $this->Alertes->newEntity();
//		
//		debug( $this->request->is('post') );	
//        if ($this->request->is('post')) {
//
//			$newsms = $this->Alertes->patchEntity($newsms, $this->request->data);
//			$newsms->success  = $this->send( $newsms ) ? 1 : 0;
//			
//			debug( $newsms->success );
//			
////			if ($this->Alertes->save($newsms)) {
////				
////				$this->Flash->success(__('The alerte has been saved.'));
////				return $this->redirect(['action' => 'index']);
////				
////			} else {
////				$this->Flash->error(__('The alerte could not be saved. Please, try again.'));
////			}
////
//        }
//
//        $this->set(compact('alerte'));
//        $this->set('_serialize', ['alerte']);
//    }

    /**
     * Delete method
     *
     * @param string|null $id Alerte id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
//    public function delete($id = null)
//    {
//        $this->request->allowMethod(['post', 'delete']);
//        $alerte = $this->Alertes->get($id);
//        if ($this->Alertes->delete($alerte)) {
//            $this->Flash->success(__('The alerte has been deleted.'));
//        } else {
//            $this->Flash->error(__('The alerte could not be deleted. Please, try again.'));
//        }
//
//        return $this->redirect(['action' => 'index']);
//    }
}
