<script src="https://www.google.com/recaptcha/api.js?render={{ config('recaptcha.public_key') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('recaptcha.public_key') }}').then(function(token) {
            document.getElementById("recaptcha_token").value = token;
        }); });
</script>
