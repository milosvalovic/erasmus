<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 col-sm-12">
                <div class="search-modal">
                    <h1>Vyhľadávajte a <br>prihlaste sa na <span id="typed"></span>.</h1>
                    <div class="input-items">
                        <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                            <label for="krajina">KRAJINA</label>
                            <input type="text" name="country" id="krajina" value="" placeholder="Nemecko">
                            <label for="pobyt">TYP POBYTU</label>
                            <select name="stays" id="pobyt">
                                <option value="volvo">Stáž</option>
                            </select>
                            <br/>
                            <label for="univerzita">UNIVERZITA</label>
                            <input type="text" name="university" id="univerzita" value=""
                                   placeholder="Technische Universität">
                            <label for="hodnotenie">HODNOTENIE</label>
                            <select name="rating" id="hodnotenie">
                                <option value="5">5</option>
                            </select>
                            <br/>
                            <label for="od">OD</label>
                            <input type="text" name="from" id="od" value="" placeholder="01.01.2020">
                            <label for="do">DO</label>
                            <input type="text" name="to" id="do" value="" placeholder="02.02.2020">

                            <input type="submit" name="search" value="Hľadať">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>