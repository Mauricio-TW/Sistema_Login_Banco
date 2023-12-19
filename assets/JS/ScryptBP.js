//Bate Papo
        // resgatando o campo html que será impresso as mensagens 
        const mensagemChat = document.getElementById("mensagem-chat")

        // endereço do websocket
        const ws = new WebSocket('ws://localhost:8080')
        //realizar a conexão com websocket
        ws.onopen = (e) => {
            // console.log("Conectado!");
        }

        //receber a mensagem do websocket
        ws.onmessage = (mensagemRecebida) => {
            // ler mensagem enviada pelo websocket
            let resultado = JSON.parse(mensagemRecebida.data)

            // enviar a mensagem para o HTML, inserindo no final da lista de mensagens
            mensagemChat.insertAdjacentHTML('beforeend', ` ${resultado.mensagem}<br>`)
        }

        const enviar = () => {
            // resgatando o campo mensagem
            let mensagem = document.getElementById("mensagem")

            let nomeUsuario = document.getElementById("nome-usuario").textContent

            // criar um array de dados para enviar para websocket
            let dados = {
                mensagem: `${nomeUsuario}: ${mensagem.value}<br>`
            }
            // enviar a mensagem para o websocket
            ws.send(JSON.stringify(dados))

            // enviar a mensagem para o HTML, inserindo no final da lista de mensagens
            mensagemChat.insertAdjacentHTML('beforeend', `${nomeUsuario}: ${mensagem.value}<br>`)

            // limpar o campo de mensagem
            mensagem.value = ''
        }
