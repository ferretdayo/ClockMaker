var formApp = new Vue({
    el: '#form',
    parent: app,
    template: `
        <table>
            <thead>
                <th class="hour">時針</th>
                <th class="font-size" style="font-size: 14px;">文字サイズ</th>
                <th class="x">横軸</th>
                <th class="x">縦軸</th>
            </thead>
            <tbody>
                <tr v-for="hourData in hourObj" class="form-group">
                    <td>
                        <input type="text" class="hour" v-model="hourData.hour" placeholder="磁針">
                    </td>
                    <td>
                        <input type="number" class="font-size" mim=1 v-model="hourData.size" placeholder="文字サイズ(px)">
                    </td><br>
                    <td>
                        <input type="range" max="500" min="0" class="x" v-model="hourData.x" placeholder="x軸">
                    </td>
                    <td>
                        <input type="range" max="500" min="0" class="y" v-model="hourData.y" placeholder="y軸">
                    </td>
                </tr>
            </tbody>
        </table>
    `,
    data: {
        //時針に関するオブジェクト
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
    //hourObjの値が変わった際，親にデータを渡す
    created: function(){
        this.$watch('hourObj', function(newVal, oldVal){
            this.$dispatch('hourData', this.hourObj);
        }, {
            deep:true
        });
    }
});
