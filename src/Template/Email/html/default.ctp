<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>


<table class="body-wrap">
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">

                        <h4>Contenu du message :</h4>

                    </td>
                </tr>
                <tr>
                    <td class="content">

                        <?php
$content = explode("\n", $content);

foreach ($content as $line):
    echo '<p> ' . $line . "</p>\n";
                        endforeach;
                        ?>

                        <table>
                            <tr>
                                <td align="center">
                                    <form action="http://localhost:8765/messages">
                                        <input type="submit" value="REPONDRE" />
                                    </form>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                        <p>Ce message est généré par <a href="#">Ebrigade v2 by SimplonTeam</a> , merci de ne pas y répondre directement!</p>
                        <p>Pour contacter les développeurs :  <a href="mailto:">support-ebrigadev2@gmail.com</a> </p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

