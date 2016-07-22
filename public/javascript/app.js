var app = new Vue({
    el: "#vue",
    data : {
        hourObj: [
            {hour: 1, size: 40, x: 315, y: 140},
            {hour: 2, size: 40, x: 365, y: 185},
            {hour: 3, size: 40, x: 390, y: 265},
            {hour: 4, size: 40, x: 365, y: 340},
            {hour: 5, size: 40, x: 315, y: 385},
            {hour: 6, size: 40, x: 240, y: 405},
            {hour: 7, size: 40, x: 175, y: 385},
            {hour: 8, size: 40, x: 115, y: 340},
            {hour: 9, size: 40, x: 90, y: 265},
            {hour: 10, size: 40, x: 105, y: 190},
            {hour: 11, size: 40, x: 155, y: 140},
            {hour: 12, size: 40, x: 225, y: 120},
        ]
    },
    methods: {
        //時計の描画
        draw: function(){
            var clock = document.getElementById('clock');
            var ctx = clock.getContext('2d');
            this.drawClock(ctx);
        },
        //メモリを書く関数
        scale: function(ctx, scaleType, lineHeight, lineWidth){
            var rotate = scaleType === "minute" ? Math.PI/30 : scaleType === "hour" ? Math.PI/6 : -1;
            if(rotate === -1) return;
            ctx.save();
            ctx.translate(250,250);
            ctx.lineWidth = lineWidth;
            for(var i = 0; i < 60; i++){
                ctx.beginPath();
                ctx.rotate(rotate);
                ctx.moveTo(200-lineHeight, 0);
                ctx.lineTo(200, 0);
                ctx.stroke();
            }
            ctx.restore();
        },
        drawClock: function(ctx){
            var date = new Date();

            //円の作成
            ctx.beginPath();
            ctx.lineWidth = 5;
            ctx.arc(250, 250, 200, 0, Math.PI*2, true);
            ctx.stroke();

            //分の目盛
            this.scale(ctx, "minute", 20, 2);
            //時の目盛
            this.scale(ctx, "hour", 30, 5);

            //時針
        	ctx.save();
            ctx.translate(250,250);
            ctx.rotate(Math.PI/6 * (date.getHours() + date.getMinutes() / 60) - Math.PI/2);
        	ctx.lineWidth = 8;
        	ctx.beginPath();
        	ctx.moveTo(-5, 0);
        	ctx.lineTo(80, 0);
            ctx.stroke();
        	ctx.restore();
            //分針
            ctx.save();
            ctx.translate(250,250);
            ctx.rotate(Math.PI/30 * (date.getMinutes() + date.getSeconds() / 60) - Math.PI/2);
            ctx.lineWidth = 4;
            ctx.beginPath();
            ctx.moveTo(-5, 0);
            ctx.lineTo(100, 0);
            ctx.stroke();
            ctx.restore();

            //時間の指定がある場合
            for(var i = 0; i < this.hourObj.length; i++){
                ctx.save();
                ctx.font = this.hourObj[i].size + 'px Century Gothic';
                ctx.fillText(this.hourObj[i].hour, this.hourObj[i].x, this.hourObj[i].y);
                ctx.restore();
            }
        },
    },
    events: {
        'hourData': function(hourData){
            console.log("event");
            console.log(hourData);
        }
    }
});
