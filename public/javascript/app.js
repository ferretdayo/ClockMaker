var app = new Vue({
    el: "#vue",
    data : {
        //canvas用の変数
        cvs: document.getElementById('clock'),
        ctx: document.getElementById('clock').getContext('2d'),
        hourObj: [
            {hour: 1, size: 40, x: 325, y: 145},
            {hour: 2, size: 40, x: 375, y: 190},
            {hour: 3, size: 40, x: 390, y: 265},
            {hour: 4, size: 40, x: 370, y: 335},
            {hour: 5, size: 40, x: 320, y: 385},
            {hour: 6, size: 40, x: 250, y: 405},
            {hour: 7, size: 40, x: 185, y: 385},
            {hour: 8, size: 40, x: 130, y: 340},
            {hour: 9, size: 40, x: 105, y: 265},
            {hour: 10, size: 40, x: 135, y: 190},
            {hour: 11, size: 40, x: 185, y: 140},
            {hour: 12, size: 40, x: 250, y: 125},
        ]
    },
    methods: {
        //時計の描画
        draw: function(){
            this.ctx.clearRect(0, 0, 500, 500);

            //背景色を設定
            this.ctx.save();
            this.ctx.fillStyle = 'rgb(255, 255, 255)';
            this.ctx.fillRect(0, 0, 500, 500);
        	this.ctx.restore();

            //時計の描画
            this.drawClock();
        },
        //メモリを書く関数
        scale: function(scaleType, lineHeight, lineWidth){
            var rotate = scaleType === "minute" ? Math.PI/30 : scaleType === "hour" ? Math.PI/6 : -1;
            if(rotate === -1) return;
            this.ctx.save();
            this.ctx.translate(250,250);
            this.ctx.lineWidth = lineWidth;
            for(var i = 0; i < 60; i++){
                this.ctx.beginPath();
                this.ctx.rotate(rotate);
                this.ctx.moveTo(200-lineHeight, 0);
                this.ctx.lineTo(200, 0);
                this.ctx.stroke();
            }
            this.ctx.restore();
        },
        drawClock: function(){
            var date = new Date();

            //円の作成
            this.ctx.beginPath();
            this.ctx.lineWidth = 5;
            this.ctx.arc(250, 250, 200, 0, Math.PI*2, true);
            this.ctx.stroke();

            //分の目盛
            this.scale("minute", 20, 2);
            //時の目盛
            this.scale("hour", 30, 5);

            //時針
        	this.ctx.save();
            this.ctx.translate(250,250);
            this.ctx.rotate(Math.PI/6 * (date.getHours() + date.getMinutes() / 60) - Math.PI/2);
        	this.ctx.lineWidth = 8;
        	this.ctx.beginPath();
        	this.ctx.moveTo(-5, 0);
        	this.ctx.lineTo(80, 0);
            this.ctx.stroke();
        	this.ctx.restore();
            //分針
            this.ctx.save();
            this.ctx.translate(250,250);
            this.ctx.rotate(Math.PI/30 * (date.getMinutes() + date.getSeconds() / 60) - Math.PI/2);
            this.ctx.lineWidth = 4;
            this.ctx.beginPath();
            this.ctx.moveTo(-5, 0);
            this.ctx.lineTo(100, 0);
            this.ctx.stroke();
            this.ctx.restore();
            //秒針
            this.ctx.save();
            this.ctx.translate(250,250);
            this.ctx.rotate(Math.PI/30 * date.getSeconds());
            this.ctx.lineWidth = 2;
            this.ctx.beginPath();
            this.ctx.strokeStyle = "#cc0000";
            this.ctx.moveTo(-5, 0);
            this.ctx.lineTo(105, 0);
            this.ctx.stroke();
            this.ctx.restore();

            //時間のレンダリング
            for(var i = 0; i < this.hourObj.length; i++){
                this.ctx.save();
                this.ctx.font = this.hourObj[i].size + 'px Century Gothic';
                this.ctx.textAlign = "center";
                this.ctx.fillText(this.hourObj[i].hour, this.hourObj[i].x, this.hourObj[i].y);
                this.ctx.restore();
            }
        },
    },
    //イベントの受け取り
    events: {
        /*
            hourDataが変更された時に子からイベントを受け取り，canvasに反映させる
        */
        'hourData': function(hourData){
            this.hourObj = hourData;
            this.draw();
        }
    }
});
