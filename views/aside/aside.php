<?php
	if ($_SESSION["id_rol"] == 1){
?>
		<nav class="side-menu" style="background-color: gainsboro;">
			<ul class="side-menu-list">
				<li class="blue-dirty">
					<a href="../home/">
						<span class="glyphicon glyphicon-home"></span>
						<span class="lbl">Inicio</span>
					</a>
				</li>
                <li class="blue-dirty">
					<a href="../usuarios/">
						<span class="glyphicon glyphicon-user"></span>
						<span class="lbl">Usuarios</span>
					</a>
				</li>
                <li class="blue-dirty with-sub">
                    <span>
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span class="lbl">Residentes</span>
                    </span>
                    <ul>
                        <li><a href="profile.html"><span class="lbl">Entradas</span></a></li>
                        <li><a href="profile-2.html"><span class="lbl">Salidas</span></a></li>
                    </ul>
                </li>
				<li class="blue-dirty with-sub">
                    <span>
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span class="lbl">Visitas</span>
                    </span>
                    <ul>
                        <li><a href="profile.html"><span class="lbl">Entradas</span></a></li>
                        <li><a href="profile-2.html"><span class="lbl">Salidas</span></a></li>
                    </ul>
                </li>
                <li class="blue-dirty with-sub">
                    <span>
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span class="lbl">Provedores</span>
                    </span>
                    <ul>
                        <li><a href="profile.html"><span class="lbl">Entradas</span></a></li>
                        <li><a href="profile-2.html"><span class="lbl">Salidas</span></a></li>
                    </ul>
                </li>
				<li class="blue-dirty">
					<a href="../logout/logout.php">
						<span class="glyphicon glyphicon-log-out"></span>
						<span class="lbl">Cerrar sesion</span>
					</a>
				</li>
			</ul>
		</nav>
<?php
	} else {
?>
		<nav class="side-menu" style="background-color: gainsboro;">
			<ul class="side-menu-list">
				<li class="blue-dirty">
					<a href="../home/">
						<span class="glyphicon glyphicon-home"></span>
						<span class="lbl">Inicio</span>
					</a>
				</li>
                <li class="blue-dirty with-sub">
                    <span>
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span class="lbl">Residentes</span>
                    </span>
                    <ul>
                        <li><a href="profile.html"><span class="lbl">Entradas</span></a></li>
                        <li><a href="profile-2.html"><span class="lbl">Salidas</span></a></li>
                    </ul>
                </li>
				<li class="blue-dirty with-sub">
                    <span>
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span class="lbl">Visitas</span>
                    </span>
                    <ul>
                        <li><a href="profile.html"><span class="lbl">Entradas</span></a></li>
                        <li><a href="profile-2.html"><span class="lbl">Salidas</span></a></li>
                    </ul>
                </li>
                <li class="blue-dirty with-sub">
                    <span>
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span class="lbl">Provedores</span>
                    </span>
                    <ul>
                        <li><a href="profile.html"><span class="lbl">Entradas</span></a></li>
                        <li><a href="profile-2.html"><span class="lbl">Salidas</span></a></li>
                    </ul>
                </li>
				<li class="blue-dirty">
					<a href="../logout/logout.php">
						<span class="glyphicon glyphicon-log-out"></span>
						<span class="lbl">Cerrar sesion</span>
					</a>
				</li>
			</ul>
		</nav>		
<?php
	}
?>
