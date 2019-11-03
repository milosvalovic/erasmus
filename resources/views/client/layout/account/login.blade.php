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
                                <h3>Prihlásenie</h3>
                                <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="" placeholder="meno.priezvisko@student.ukf.sk">
                                    <br/>
                                    <label for="password">Heslo</label>
                                    <input type="password" name="password" id="password" value="" placeholder="********">
                                    <br/>
                                    <input type="submit" value="Prihlásiť sa">
                                </form>
                                <ul class="sub-nav">
                                    <li><a class="sub-nav-item" href="{{ url('/') }}">Vytvoriť účet</a></li>
                                    <li><a class="sub-nav-item" href="{{ url('/') }}">Zabudli ste údaje na prístup k účtu?</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>