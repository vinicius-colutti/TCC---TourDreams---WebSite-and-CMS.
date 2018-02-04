<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <style>
            /*estilos do wrapper*/
            .filefield {
                border: tomato thin solid;
                display: inline-block;
                padding: 0.3em;
            }

            /*escondendo o input*/
            .filefield input[type=file]{
                display: none;
                z-index: -1;
            }
        </style>


    </head>
    <body>
        <!--coloque o input dentro de um wrapper-->
        <div class="filefield" id="myfile">
            <!--tcha, ramm! o input-->
            <input type="file" multiple>
            <!--um texto para mostra alguma coisa-->
            Escolha os arquivos
            <!--se quiser dá pra colocar um botão, uma imagem, ou outra coisa-->
            <button id="btn">Escolher</button>
        </div>

        <!--a mágica está aqui-->
        <script>
//            pega o wrapper
            var filefield = document.getElementById('myfile');
//            função para abrir o dialog de seleção de arquivo
            var opendialog = function(evt){
                var children = evt.target.getElementsByTagName('input');
                var input = children[0];
                console.log(input);
                if(input !== undefined){
                    input.click();//simula o click no input
                }
            };

            //adiciona a função de disparo do click no input ao wrapper
            filefield.addEventListener('click', function(evt){
                opendialog(evt);
            });

            //faz o mesmo no button. faça isso se usar um button, imagem ou outro elemento
            document.getElementById('btn').addEventListener('click', function(evt){
                opendialog(filefield);//note que tem que passar o wrapper para a função
            });

//            ao alterar o valor do input, pega a lsita de arquivos e coloca no wrapper
            var input = filefield.getElementsByTagName('input')[0];
            input.addEventListener('change', function(evt){
                console.log(evt.target.files);
                var files = evt.target.files;
                if(files.length > 0){
                    for(var i = 0, len = files.length; i < len; i++){
                        var el = document.createElement('p');
                        el.innerHTML = files[i].name;
                        filefield.appendChild(el);
                    }
                }

            });
        </script>
    </body>
</html>
