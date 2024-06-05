<header>
  <a href="<?php echo e(route('estudiante.index')); ?>">
      <img class="logo" src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo">
  </a>
  <nav>
      <ul class="links">
          <li><a href="<?php echo e(route('estudiante.libros')); ?>">Libros</a></li>
          <li><a href="<?php echo e(route('estudiante.tusprestamos')); ?>">Tus préstamos</a></li>
      </ul>
  </nav>
  <form id="logout-form" action="<?php echo e(backpack_url('logout')); ?>" method="POST" style="display: none;">
      <?php echo csrf_field(); ?>
  </form>
  <a class="btn-cerrar" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <button>Cerrar Sesión</button>
  </a>
</header>


<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
}
li, a, button {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 18px;
  color: black;
  text-decoration: none;
}
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 10%;
  background-color: #f9f5ef;
}
.links {
  display: flex;
  flex-direction: row;
}
.links li {
  padding: 20px;
  list-style: none;
}
.links li a {
  color: #ff6f00;
  transition: color 0.3s;
}
.links li a:hover {
  color: #0051e6;
}
.btn-cerrar button {
  background-color: #ff6f00;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}
.btn-cerrar button:hover {
  background-color: #e65100;
}
.logo {
  width: 200px;
}
</style>
<?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/resources/views/estudiante/navbar.blade.php ENDPATH**/ ?>