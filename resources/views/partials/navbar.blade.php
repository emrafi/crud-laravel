  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
          <a class="navbar-brand" href="/">MRF Library</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link {{ ($title==="Home") ? 'active' : '' }}" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ ($title==="Book") ? 'active' : '' }}" href="/book">Books</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ ($title==="Category") ? 'active' : '' }}" href="/category">Category</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
