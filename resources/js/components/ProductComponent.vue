<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                         <table id="productsTable" class="table">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Color</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="product in products">
                                <td>{{product.name}}</td>
                                <td>{{product.sku}}</td>
                                <td>{{product.stock}}</td>
                                <td>{{product.price}}</td>
                                <td>{{product.color}}</td>
                              </tr>
                            </tbody>
                          </table>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
  props: ['products'],
}
</script>
