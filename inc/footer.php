

    <footer class="footer container">
        <p>Faqja e punuar nga studentet e shkolles <strong>Probit academy</strong></p>
    </footer>
    <script src="inc\jquery-3.6.0.js"></script>
    <script src="inc\slick.min.js"></script>
    <script src="inc\jquery.validate.min.js"></script>

<script>
    $().ready(function() {
        $("#login").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                fjalekalimi: {
                    required: "Ju lutem shkruani fjalekalimin",
                    minlength: "Fjalekalimi duhet te ket se paku 5 karaktere"
                },
                email: {
                    required: "Ju lutem shkruani emailin",
                    email: "Ju lutem shkruani nje email valide"
                }
            }

        });
        $("#anetari").validate({
            rules: {
                emri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                mbiemri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                telefoni: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Emri nuk duhet te kete numra "
                },
                mbiemri: {
                    required: "Ju lutem shenoni mbiemrin",
                    minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Mbiemri nuk duhet te kete numra "
                },
                telefoni: {
                    required: "Ju lutem shenoni telefonin"
                },
                email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni emaili adres valide"
                },
                fjalekalimi: {
                    required: "Ju lutem shenoni fjalekalimin",
                    minlength: "Fjalekalimi i juaj duhet te kete se paku gjashte karaktere"
                }

            }
        });
        $("#pune").validate({
            rules: {
                datapune: {
                    required: true,
                },
                pershkrimi: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                datapune: {
                    required: "Ju lutem shenoni daten"
                },
                pershkrimi: {
                    required: "Ju lutem shenoni pershkrimin",
                    minlength: "Pershkrimi i juaj duhet te kete se paku 20 karaktere"
                }
            }
        });
        $("#projekti").validate({
            rules: {
                dataefillimit: {
                    required: true,
                },
                dataembarimit: {
                    required: true,
                },
                pershkrimi: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                dataefillimit: {
                    required: "Ju lutem shenoni daten e fillimit",
                },
                dataembarimit: {
                    required: "Ju lutem shenoni daten e mbarimit",
                },
                pershkrimi: {
                    required: "Ju lutem shenoni pershkrimin",
                    minlength: "Perhskrimi i juaj duhet te kete se paku 20 karaktere"
                }
            }
        });
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
    });
    $('.slider').slick({
        dots: true,
        // infinite: false,
        //  speed: 300,
        nextArrow: false,
        prevArrow: false,
        slidesToShow: 3,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('#dalja').click(function(){
        $.ajax({
            url: './inc/functions.php?argument=dalja',
            success: function(data) {
                window.location.href = data;
            }
        });
    });
    $('#mesazhi').fadeOut(8000,function(){
        $.ajax({
            url: './inc/functions.php?argument=mesazhi'
        });
    });
</script>

</body>
</html>