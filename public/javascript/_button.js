var submitApp = new Vue({
    el: '#post',
    parent: app,
    data: {
        img: "",
    },
    methods: {
        submit: function (e) {
            this.img = this.$parent.cvs.toDataURL()
            this.$http.post('/tweet', {img: this.img}).then(function(response){
                console.table(response);
            }, function(response){
                alert("なんかエラーしてるよ");
            });
        }
    }
});
