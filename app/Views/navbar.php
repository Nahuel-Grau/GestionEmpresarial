<nav class="navbar navbar-expand navbar-dark" style="background-color:#1f2937;">
    <div class="container-fluid">

        <!-- Marca -->
        <a class="navbar-brand fw-semibold" href="#">
            Gestión
        </a>

        <!-- Links -->
        <div class="nav navbar-nav">
            <a class="nav-link " href="/">Inicio</a>
            <a class="nav-link " href="/dashboard">Dashboard</a>
            <a class="nav-link " href="/productos">Productos</a>
            <a class="nav-link" href="/categorias">Categorías</a>
   
        </div>

        <!-- Login a la derecha -->
        <?php  if(!isset($_SESSION['usuario'])){?>

            
        
        <div class="ms-auto dropdown">
            <button 
                class="btn btn-outline-light dropdown-toggle fw-semibold"
                data-bs-toggle="dropdown"
            >
                Ingresar
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li>
                    <a class="dropdown-item" href="/login">
                        Iniciar sesión
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/register">
                        Registrarse
                    </a>
                </li>
            </ul>
        </div>  
         <?php   } else {?>
         <div class="ms-auto dropdown">
            <button 
                class="btn btn-outline-light dropdown-toggle fw-semibold"
                data-bs-toggle="dropdown"
            >
                <?php echo $_SESSION['usuario']['nombre'];?>
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li>
                    <a class="dropdown-item" href="/logout">
                        Log out
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/register">
                        boton 2
                    </a>
                </li>
            </ul>
        </div> <?php  }?> 
    </div>
</nav>