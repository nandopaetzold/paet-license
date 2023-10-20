<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentação API - Paet License</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="row">
            <nav class="col-12">
                <h1>Documentação API - Paet License</h1>
                <p>Documentação da API do projeto Paet License</p>
                <hr>
                <h2>Rotas</h2>
                <ul>
                    <li><a href="#">Documentação da API</a></li>
                    <li><a href="#">Documentação da API em JSON</a></li>
                </ul>
            </nav>

        </header>
        <section class="row">
            <section class="accordion" id="accordionExample">
                <article class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="badge bg-primary mr-3">GET</span> <span class="ms-3">/api/login</span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Faz o login do usuário e retorna o token de acesso</p>
                            <p>Url endpoint:
                                <code>{{ url('/api/login') }}</code>
                            <p>Parâmetros:</p>
                            <ul>
                                <li><span class="badge bg-primary mr-3">email</span> <span class="ms-3">E-mail do
                                        usuário</span></li>
                                <li><span class="badge bg-primary mr-3">password</span> <span class="ms-3">Senha do
                                        usuário</span></li>
                            </ul>

                            <p>Exemplo de requisição:</p>
                            <div class="highlight-code">
                                <pre class="example microlight"
                                    style="display: block; overflow-x: auto; padding: 0.5em; background: rgb(51, 51, 51); color: white;">
                                    <code class="language-json" style="white-space: pre;"><span>
                              {
                                "email": "seuemail@exemplo.com",
                                "password": "suasenha"
                              }
                              <code>
                                </pre>
                            </div>
                        </div>
                    </div>
                </article>

            </section>
        </section>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
