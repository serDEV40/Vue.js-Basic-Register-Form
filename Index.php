<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="app">
        <div>
            <form class="form-group card" style="width:375px;position: absolute; left: 50%;top:50%;transform: translate(-50%,-50%);" @submit.prevent="createUser">
                <div class="card-header">
                    <h4>Giriş Yap</h4>
                </div>
                <div class="card-body">
                    <label for="mail">E-posta Adresinizi Giriniz..</label>
                    <input v-model="email" type="email" name="email" id="mail" class="form-control">
                    <br>
                    <label for="pass">Şifrenizi Giriniz..</label>
                    <input v-model="passw" type="password" name="passw" id="pass" class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">
                        Giriş Yap
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    var app = new Vue({
        el: "#app",
        data: function() {
            return {
                email: "",
                passw: ""
            }
        },
        methods: {
            createUser: function() {
                let fd = new FormData();
                fd.append('email', this.email);
                fd.append('passw', this.passw);

                axios({
                    method: 'POST',
                    url: './conn.php',
                    data: fd,
                    config: {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                }).then(response => {
                    console.log(response)
                });

                this.email="";
                this.passw="";
            }
        },
    });

    console.log(app);
</script>

</html>