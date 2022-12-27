<?php

function cria_footer() {
    echo("<style>
            #footer-php * {
                user-select: none;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bold;
                font-size: 1rem;
                color: white;    
            }

            #footer-php, #footer-php div {
                display: flex;
                flex-direction: row;
                align-items: center;
                height: 9vh;
                background-color: rgb(222, 49, 99);
            }

            #footer-php {
                justify-content: space-between;
                width: 100%;
            }

            #footer-php div {
                width: 30%;
                text-align: center;
                justify-content: space-evenly;
            }

         </style>");

    echo("<footer id='footer-php'>
            <div class='left'> 
                Estacionamento <i>Xaréu</i>
            </div>
            <div class='right'>
                Enzo e Graziele.
            </div>
         </footer>");
}

?>