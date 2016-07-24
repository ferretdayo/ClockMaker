var formApp = new Vue({
    el: '#form',
    parent: app,
    template: `
        <table>
            <thead>
                <th>時針</th>
                <th>サイズ</th>
                <th>x軸</th>
                <th>y軸</th>
            </thead>
            <tbody>
                <tr v-for="(key, hourData) in hourObj" class="form-group">
                    <td>
                        <input type="text" class="hour" v-model="hourObj[key].hour" placeholder="磁針">
                    </td>
                    <td>
                        <input type="number" class="font-size" v-model="hourData.size" placeholder="文字サイズ(px)">
                    </td>
                    <td>
                        <input type="number" class="x" v-model="hourData.x" placeholder="x軸">
                    </td>
                    <td>
                        <input type="number" class="y" v-model="hourData.y" placeholder="y軸">
                    </td>
                </tr>
            </tbody>
        </table>
    `,
    data: {
        //時針に関するオブジェクト
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
    //TODO まだ動かない・・・
    //this.hourObjの監視をしたいけど．．．
    created: function(){
        this.$watch('hourObj', function(newVal, oldVal){
            console.log(this.hourObj);
            this.$dispatch('hourData', this.hourObj);
        });
    }
});
console.log(formApp.$parent.ctx);
