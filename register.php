<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Starting project</title>
    <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="src/hamburger.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />

    <style>
        #reg {
            max-width: 500px !important;
        }
    </style>
</head>

<body>
    <?php include("menubar.php"); ?>

    <div id="right" class="ui container">
        <div id="reg" class="ui container center aligned segment">

            <form class="ui form">
                <div class="field">
                    <div class="field">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="4-10 Character">
                    </div>

                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Contoh : name@gmail.com">
                    </div>


                    <div class="field">
                        <label>Alamat</label>
                        <textarea name="alamat" placeholder="Alamat"></textarea>

                    </div>

                    <div class="field">
                        <label>Tanggal Lahir</label>
                        <div class="ui calendar" id="date_calendar">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input type="text" placeholder="Date">
                            </div>
                        </div>
                    </div>


                    <div class="field">
                        <label>Kota :</label>
                        <input type="text" name="kota" placeholder="">
                    </div>

                    <div class="field">
                        <label>Kode Pos :</label>
                        <input type="text" name="kode" pattern="^\d{5,6}(?:[-\s]\d{4})?$" placeholder="Contoh : 603482">
                    </div>

                    <div class="field">
                        <label>Nomor Telepon :</label>
                        <input type="text" name="telepon" placeholder="contoh : +6283156789234">
                    </div>

                    <div class="field">
                        <label>Password :</label>
                        <input type="password" name="password" placeholder="">
                    </div>

                    <div class="field">
                        <label>Confirm Password :</label>
                        <input type="password" name="password1" placeholder="">
                    </div>

                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="checkbox">
                            <label>saya menyetujui Syarat dan Ketentuan </label>
                        </div>
                    </div>
                    <div class="ui error message"></div>

            </form>



        </div>


    </div>

    </div>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>

    <script>
        $(document).ready(function() {
                $('.ui.checkbox').checkbox();
                $('#date_calendar')
                    .calendar({
                        type: 'date'
                    });



                $('.ui.form').click(function(event) {
                    event.preventDefault();
                    $('.ui.form')
                        .form({
                            fields: {
                                username: {
                                    identifier: 'username',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'Mohon masukan username'

                                        },
                                        {
                                            type: 'minLength[4]',
                                            prompt: 'Maaf, User Name minimal 4 karakter'
                                        },
                                        {
                                            type: 'maxLength[16]',
                                            prompt: 'Username maksimal memiliki 16karakter'
                                        }
                                    ]
                                },
                                email: {
                                    identifier: 'email',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'mohon masukan alamat email'
                                        },
                                        {
                                            type: 'email',
                                            prompt: 'mohon masukan alamat email yang dan sesuai format email@domain.com'
                                        }
                                    ]
                                },
                                alamat: {
                                    identifier: 'alamat',
                                    rules: [{
                                        type: 'empty',
                                        prompt: 'mohon masukan alamat'

                                    }]
                                },

                                telepon: {
                                    identifier: 'telepon',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'mohon masukan nomor telepon anda'

                                        },
                                        {
                                            type: 'number',
                                            prompt: 'nomor telepon hanya boleh mengandung angka'
                                        }
                                    ]
                                },

                                tangal: {
                                    identifier: 'tanggal',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'mohon masukan tanggal'

                                        },
                                        {
                                            type: 'date',
                                            prompt: 'mohon masukan tanggal'
                                        }
                                    ]
                                },

                                kota: {
                                    identifier: 'kota',
                                    rules: [{
                                        type: 'empty',
                                        prompt: 'mohon masukan nama kota'

                                    }]
                                },

                                kode: {
                                    identifier: 'kode',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'mohon masukan kodepos'

                                        },
                                        {
                                            type: 'number',
                                            prompt: 'Maaf, masukan kodepos dengan benar'
                                        },
                                        {
                                            type: 'exactLength[5]',
                                            prompt: 'kodepos harus memiliki 5 karakter'
                                        }
                                    ]
                                },
                                password: {
                                    identifier: 'password',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'mohon masukan password'
                                        },
                                        {
                                            type: 'minLength[6]',
                                            prompt: 'Password anda setidaknya harus {ruleValue} karakter'
                                        }
                                    ]
                                },
                                password1: {
                                    identifier: 'password1',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'mohon masukan password'
                                        },
                                        {
                                            type: 'match[password]',
                                            prompt: 'Maaf, password tidak cocok'
                                        }

                                    ]
                                },
                                terms: {
                                    identifier: 'terms',
                                    rules: [{
                                        type: 'checked',
                                        prompt: 'Maaf, Syarat dan ketentuan harus disetujui'
                                    }]
                                }
                            }
                        })




                });


            }


        );
    </script>

</body>

</html>