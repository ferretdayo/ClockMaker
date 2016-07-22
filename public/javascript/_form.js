var HourForm = Vue.extend({
    template: `
        <div v-for="hourData in hourObj">
            <input type="text" v-model="hourData.hour" placeholder="磁針">
            <input type="text" v-model="hourData.size" placeholder="文字サイズ(px)"><br>
            x : <input type="number" v-model="hourData.x" placeholder="x軸">
            y : <input type="number" v-model="hourData.y" placeholder="y軸">
        </div>
    `,
    data: function(){
        return {
            /*
            hourData: {
                hour: 1,
                size: 40,
                x: 10,
                y: 0,
            }
            */
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
        }
    },
    methods: {
        dispatchData: function(){
            this.$dispatch('hourData', this.hourData);
        }
    }
});
Vue.component('hour-form', HourForm);
