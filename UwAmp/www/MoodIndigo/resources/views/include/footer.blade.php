<style>
    footer {
        background-color: #292c2f;
        width 100%;
        height: 17%;
        position: fixed;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .12);
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        font: 700 16px sans-serif;
        padding-top: 2%;
        padding-left: 1%;
        padding-right: 1%;
        margin-top: 50px;
        bottom: 0;
        color: #fff
    }

    .fa.footer-contacts-icon, .social-links a {
        background-color: #33383b;
        text-align: center
    }

    .footer-navigation h3 {
        margin: 0 0 18px;
        font: 400 36px Cookie, cursive;
        color: #fff
    }

    .footer-navigation h3 a {
        text-decoration: none;
        color: #fff
    }

    .footer-navigation h4 span {
        color: rebeccapurple
    }

    .footer-navigation p.links a {
        color: #fff;
        text-decoration: none
    }

    .footer-navigation p.company-name {
        color: #8f9296;
        font-size: 14px;
        font-weight: 400;
        margin-top: 20px
    }

    @media (max-width: 767px) {
        .footer-contacts {
            margin: 30px 0
        }
    }

    .footer-contacts p {
        display: inline-block;
        color: #fff;
        vertical-align: middle
    }

    .footer-contacts p a {
        color: #5383d3;
        text-decoration: none
    }

    .fa.footer-contacts-icon {
        color: #fff;
        font-size: 18px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        line-height: 38px;
        margin: 10px 15px 10px 0
    }

    span.new-line-span {
        display: block;
        font-weight: 400;
        font-size: 14px;
        line-height: 2
    }

    .footer-about h4 {
        display: block;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 20px
    }

    .footer-about p {
        line-height: 20px;
        color: #92999f;
        font-size: 13px;
        font-weight: 400;
        margin: 0
    }

    div.social-links {
        margin-top: 20px;
        color: #fff
    }

    .social-links a {
        display: inline-block;
        width: 35px;
        height: 35px;
        cursor: pointer;
        border-radius: 2px;
        font-size: 20px;
        color: #fff;
        line-height: 35px;
        margin-right: 5px;
        margin-bottom: 5px
    }
</style>


<footer>
    <div class="row ">
        <div class="col-sm-6 col-md-4 footer-navigation">
            <h4>Mood<span>Indigo</span></h4>
            <p class="links">
                <a href="http://localhost/MoodIndigo/public/">Home</a>
                <strong> · </strong>
                @guest
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                <strong> · </strong>
                    @if (Route::has('register'))
                        <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="{{route('projects.index')}}">Dashboard Progetti</a>
                    <strong> · </strong>
                     <a href="{{route('analysis.index')}}">Dashboard Analisi</a>
                @endguest
            </p>
            <p class="company-name">MoodIndigo CC 2020</p>
        </div>
        <div class="col-sm-6 col-md-4 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                <p><span class="new-line-span"><br><em>Università degli Studi di Bari&nbsp;</em><br><em>Ex II Facoltà di Scienze MM.FF.NN</em><br></span>
                    Taranto, Italia</p>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6 col-md-4 footer-about">
            <br><h4>MoodIndigo</h4>
            <p>Il team MoodIndigo nasce nel dicembre 2019 per la realizzazione del progetto di PPW del corso ICD di
                Taranto.</p>
            <div class="social-links social-icons"></div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>--}}

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
        crossorigin="anonymous"></script>



