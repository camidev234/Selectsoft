<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/adminPanel.css')}}">
    <title>Editar Candidato</title>
</head>
<body>
    <main class="page">
        <header class="header">
            <section class="logo">
                <img src="{{asset('img/SELECTSOFTFooterIcon.png')}}" alt="">
            </section>
            <section class="user-log">
                <img src="{{asset('img/personIcon.jpg')}}" alt="">
                <h5>{{$user->name}} {{$user->last_name}}</h5>
            </section>
            <section class="logout">
                <form action="{{route('user.logout')}}" method="post">
                    @csrf
                    <button>Cerrar sesion</button>
                </form>
            </section>
        </header>
        <section class="sidebar">
            <a href="{{route('instructor.index')}}"><article class="option-admin modi" style="background-color: white;">
                <img src="{{asset('img/personIcon.jpg')}}" alt="icono_persona">
                <a href=""><h3>Ver candidatos</h3></a>
            </article></a>

            <a href="{{route('instructor.recruiters')}}"><article class="option-admin">
                <img src="{{asset('img/img-recruiter.png')}}" alt="icono_verr">
                <h3>Ver Reclutadores</h3>
            </article></a>

            <a href="{{route('instructor.selectors')}}"><article class="option-admin">
                <img src="{{asset('img/descarga__13_-removebg-preview.png')}}" alt="icono_verS">
                <h3>Ver Seleccionadores</h3>
            </article></a>

            <a href=""><article class="option-admin">
                <img src="{{asset('img/descarga__12_-removebg-preview.png')}}" alt="icono_verA">
                <h3>Ver Administradores</h3>
            </article></a>
        </section>

        <section class="view-info">
            <section class="info-options">
                <h4>Listado de Candidatos en el sistema</h4>
                <section class="actions">
                    <article class="action acOne">
                        <img src="{{asset('img/icone-crayon-bleu.png')}}" alt="lapiz_icon">
                        <h5>Modificar Rol</h5>
                    </article>
                    <article class="action">
                        <img src="{{asset('img/papelera.png')}}" alt="icon">
                        <h5>Eliminar</h5>
                    </article>
                </section>
            </section>
            <section class="table-content">
                <table>
                    <thead>
                        <tr>
                            <th><h5>Id Rol</h5></th>
                            <th><h5>Cambiar Rol</h5>
                        </tr>
                    </thead>
                </table>
            </section>
</body>
</html>
