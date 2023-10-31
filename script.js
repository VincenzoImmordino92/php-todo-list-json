const { createApp } = Vue;

createApp({
  data(){
    return{
      apiUrl:'server.php',
      titolo:'php-todo-list-json',
      listTask: [],
      newTask:'',
    }
  },
  methods:{
    getList(){
      axios.get(this.apiUrl)
        .then(result =>{
          this.listTask = result.data;
          
        })
    },
    addNewTask(){
      const dataForm = new FormData();
      dataForm.append('newTaskItem', this.newTask);
      dataForm.append('done', false);

      axios.post(this.apiUrl,dataForm)
        .then(result =>{
          this.listTask = result.data;
          this.newTask='';
        })
    },
    removeTask(index){
      const dataForm = new FormData();
      dataForm.append('removeTask',index);
      axios.post(this.apiUrl, dataForm)
        .then(result => {
          this.listTask= result.data;
        })
    }
  },
      
  mounted(){
    this.getList()
  
  }
}).mount('#app');