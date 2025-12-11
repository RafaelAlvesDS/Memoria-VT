<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Memória VT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Usuários</a></li>
                <li class="nav-item"><a class="nav-link" href="/threads">Tópicos</a></li>
                <li class="nav-item">
                    <form action="{{ route('global.search') }}" method="GET" class="d-flex">
                        <input class="form-control search-bar me-2" type="search" name="q" placeholder="Buscar usuários ou tópicos..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Buscar</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>