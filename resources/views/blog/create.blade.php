<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Nova Notícia</h1>
                <form action="/blog" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control @error('titulo') is-invalid @enderror">
                                @error('titulo')
                                    <div  class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                        </div>
                            <div class="form-group mt-3">
                                <label for="autor">Autor</label>
                                <input type="text" name="autor" class="form-control">
                                @error('autor')
                                <div  class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="conteudo">Conteúdo</label>
                                <textarea name="conteudo"cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-12  mt-3">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
