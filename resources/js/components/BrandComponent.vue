<template>
    <div class="row">
        <div class="form-group">
            <br><br>
            <div class="col-sm-3" style="text-align: right;">
                <label>Filter By Brand:</label>
            </div>
            <div class="col-sm-3">
                <select class="form-control" @change="onChange" id="sel1" onc>
                    <option>All</option>
                    <option v-for="brand in brands" >{{brand.brand}}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
          brands: [],
         
        };
      },        
    mounted() {
        fetch("http://localhost:8000/brands")
        .then(res => res.json())
        .then(res => {
          this.brands = res.data;
        })
        .catch(err => console.log(err));            
    }, 
    methods : {
        onChange(event) {
            this.$emit('brandChange', event.target.value);
        }
    } 
}

</script>


