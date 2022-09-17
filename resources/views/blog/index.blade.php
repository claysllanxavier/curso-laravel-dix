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
                <a href="{{ route('blog.create') }}" class="btn btn-primary float-end">Nova Notícia</a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Data Criação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($noticias as $noticia)
                            <tr>
                                <td>{{ $noticia->titulo }}</td>
                                <td>{{ $noticia->autor }}</td>
                                <td>{{ $noticia->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('blog.show', $noticia->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                                    <a href="{{ route('blog.edit', $noticia->id) }}" class="btn btn-sm btn-warning">Edição</a>
                                    <form action="{{ route('blog.destroy', $noticia->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-danger btn-remove">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nenhum dado encontrado</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script>
        var buttons = document.querySelectorAll('.btn-remove')

        buttons.forEach(button => {
            button.addEventListener("click", function() {
                let text = "Você deseja excluir?";
                if (confirm(text) == true) {
                    var form = button.parentElement;
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>
