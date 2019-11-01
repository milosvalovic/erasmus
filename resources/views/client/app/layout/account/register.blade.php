<div class="container-fluid">
    <div class="row no-gutter account">
        <div class="d-none d-md-flex col-xl-7 bg-image">
            <div class="bg-shadow"></div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="login">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 text-left mx-auto">
                            <div class="content">
                                <h3>Registrácia</h3>
                                <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                                    <label for="firstname">Meno</label>
                                    <input type="text" name="firstname" id="firstname" value="" placeholder="Michal">
                                    <br/>
                                    <label for="lastname">Priezvisko</label>
                                    <input type="text" name="lastname" id="lastname" value="" placeholder="Králik">
                                    <br/>
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="" placeholder="meno.priezvisko@student.ukf.sk">
                                    <br/>
                                    <label for="password">Heslo</label>
                                    <input type="password" name="password" id="password" value="" placeholder="********">
                                    <br/>
                                    <label for="confirm-password">Potvrdenie hesla</label>
                                    <input type="password" name="confirm" id="confirm-password" value="" placeholder="********">
                                    <br/>
                                    <input type="submit" value="Registrovať sa">
                                </form>
                                <ul class="sub-nav">
                                    <li><a class="sub-nav-item" href="{{ url('/') }}">Späť na prihlásenie</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>