const { createApp } = Vue;

createApp({
  data(){
    return{
      apiUrl:'server.php',
      titolo:'php-todo-list-json',
      listTask: []
    }
  },
  methods:{
    getList(){
      axios.get(this.apiUrl)
        .then(result =>{
          this.listTask = result.data;
          console.log(this.listTask);
        })

    }
  },
  mounted(){
    this.getList()
  }
}).mount('#app');