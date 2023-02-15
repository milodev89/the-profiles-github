
<template>
  <Bar
    id="my-chart-id"
    :options="chartOptions"
    :data="chartData"
  />
</template>
<script>
  import axios from 'axios'
  import { isProxy, toRaw } from 'vue';
  import { Bar } from 'vue-chartjs'
  import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

  ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

  export default {
    name: 'BarChart',
    components: { Bar },
    props: ['profiles'],
    data() {
      return {
        labels: [],
        valuesChart: [],
        chartData: {
          labels: [],
          datasets:[
            {label: 'Followers', data: []}
          ]
        },
        chartOptions: {
          responsive: true
        }
      }
    },
    async mounted(){
      await this.getProfiles();
      this.chartData = {
        labels: this.labels,
        datasets:[
          {label: 'Followers', data: this.valuesChart, backgroundColor:"#0a58ca"}
        ]
      }
    },

    methods: {
      async getProfiles(){
        let profilesData = (isProxy(this.profiles)) ? toRaw(this.profiles) : this.profiles;
        for (let index = 0; index < profilesData.length; index++) {
          let user_info = await this.getFollowersByUser(profilesData[index].login); 
          this.labels.push(profilesData[index].login);    
          this.valuesChart.push(user_info.data.followers);
        }
        return ;
      },
      getFollowersByUser : async(user) => {
        return axios.get(`https://api.github.com/users/`+user);
      }
    }
  }
</script>