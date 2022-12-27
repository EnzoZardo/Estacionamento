<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function cria_header() {
    echo("<style>
            #header-php * {
                user-select: none;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bold;
                font-size: 1rem;
                color: white;    
            }

            #header-php, #header-php div {
                display: flex;
                flex-direction: row;
                align-items: center;
                height: 9vh;
                background-color: rgb(222, 49, 99);
            }

            #header-php {
                justify-content: space-between;
                width: 100%;
            }

            #header-php div {
                width: 30%;
                text-align: center;
                justify-content: space-evenly;
            }

            #header-php .right form, #header-php .right form input {
                width: 100%;
                height: 100%;
            }

            #header-php .right form input {
                background-color: rgb(222, 49, 99);
                border: none;
                height: 100%;
                transition: all 0.5s;
            }

            #header-php .right form input:hover {
                background-color: rgb(254, 254, 254);
                color: rgb(222, 49, 99);
            }

         </style>");

    echo("<header id='header-php'>
            <div class='left'> Usuário: ".
                $_SESSION['usuario'].
            "</div>
            <div class='right'>
                <form action='../telas/telaOcupacao.php'><input type='submit' value='Ocupação'></form>
                <form action='../acoes/logout.php'><input type='submit' value='Sair'></form>    
            </div>
         </header>");
}

?>