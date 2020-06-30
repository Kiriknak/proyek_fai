$(document).ready(function() {
    $('.ui.checkbox').checkbox();
    $('.close.icon.msg').on('click', function() {
        $('.msg').addClass('hidden');
    })
    $('#date_calendar')
        .calendar({
            type: 'date'
        });

        $("input[name='username']").on('blur', function() {

            //$(this).addClass('loading');
            var username = $("input[name='username']").val();
            
            $('input[type="submit"]').removeClass('disabled');

            $.ajax({
                type: "post",
                url: "ajax/checkuser.php",
                data: "username=" + username,
                success: function(data) {
                    if (data == 0) {
                        
                        $('.ui.message.msg').addClass('success');
                        $('.header.msg').html('Username Available');
                        $('.ui.message.msg').removeClass('error');
                        $('.ui.')
                        

                    } else {
                        $('.ui.message.msg').addClass('error');
                        
                        $('.header.msg').html('Username unavailable');
                        //$('p .msg').html("please select another username");
                        //$('p .msg').removeClass("hidden");
                        $('.ui.message.msg').removeClass('success');
                        //$('button[name="submit"]').addClass('disabled');

                    }
                    $('.ui.message.msg').removeClass('hidden');

                }   
            });

            $('.ui.message.msg').addClass('visible');
            $(this).removeClass('loading');

        });



    $('.ui.form').click(function() {
        
        $('.ui.form')
            .form({
                on: 'blur',
                //fields : validationRules,
                inline : true,
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