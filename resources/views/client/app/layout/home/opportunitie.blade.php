<div class="page-section" id="current-opportunities">
    <div class="container">
    @include('client.app.layout.home.opportunities.stays', ["studijny_pobyt" => $mobilities["studijny_pobyt"]])
    @include('client.app.layout.home.opportunities.internships', ["staz" => $mobilities["staz"]])
    @include('client.app.layout.home.opportunities.lecture_stays', ["prednaskovy_pobyt" => $mobilities["prednaskovy_pobyt"]])
    @include('client.app.layout.home.opportunities.trainings', ["skolenie" => $mobilities["skolenie"]])
</div>
</div>