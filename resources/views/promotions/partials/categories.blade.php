<div class="max-w-sm mx-auto my-2" x-model="filters.category" >
    <select x-data="categories()" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500">
      <option selected value="0">Todas las categorias</option>
      <template x-for="(item, index) in ctgs" :key="index">  
        <option :value="item.id" x-text="item.name"></option>
      </template>
    </select>
</div>

<script>
  function categories(){
    return {
      ctgs: [],
      init(){

        if(sessionStorage.getItem('categories')){
          this.ctgs = JSON.parse(sessionStorage.getItem('categories'));
        }else{
          axios.get('{{route('map.categories')}}')
          .then(res => {
            this.ctgs = res.data;
            sessionStorage.setItem("categories", JSON.stringify(res.data));
          })
        }
      }

    }
  }
  
</script>

