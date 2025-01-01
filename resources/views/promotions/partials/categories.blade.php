<div class="max-w-sm mx-auto my-2" x-model="filters.category" >
    <select  x-data="categories()" aria-label="Pilled select"
    class="select max-w-sm rounded-full bg-gray-100/70 text-black" >
      <option selected value="0">Todas las categorias</option>
      <template x-for="(item, i) in ctgs" :key="i">  
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

