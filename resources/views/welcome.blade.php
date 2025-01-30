<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Search</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
<div id="app">
    <el-container>
        <el-header>
            <h1>House Search</h1>
        </el-header>
        <el-main>
            <!-- Search Form -->
            <el-form :model="searchForm" @submit.prevent="searchHouses">
                <el-row :gutter="20">
                    <el-col :span="6">
                        <el-form-item label="Name">
                            <el-input v-model="searchForm.name" placeholder="Partial name"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Bedrooms">
                            <el-input v-model="searchForm.bedrooms" placeholder="Exact match"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Bathrooms">
                            <el-input v-model="searchForm.bathrooms" placeholder="Exact match"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Storeys">
                            <el-input v-model="searchForm.storeys" placeholder="Exact match"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Garages">
                            <el-input v-model="searchForm.garages" placeholder="Exact match"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Min Price">
                            <el-input v-model="searchForm.price_min" placeholder="Minimum price"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="Max Price">
                            <el-input v-model="searchForm.price_max" placeholder="Maximum price"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item>
                            <el-button type="primary" @click="searchHouses" :loading="loading">Search</el-button>
                        </el-form-item>
                    </el-col>
                </el-row>
            </el-form>

            <el-table :data="houses" v-loading="loading" style="width: 100%">
                <el-table-column prop="name" label="Name"></el-table-column>
                <el-table-column prop="price" label="Price"></el-table-column>
                <el-table-column prop="bedrooms" label="Bedrooms"></el-table-column>
                <el-table-column prop="bathrooms" label="Bathrooms"></el-table-column>
                <el-table-column prop="storeys" label="Storeys"></el-table-column>
                <el-table-column prop="garages" label="Garages"></el-table-column>
            </el-table>

            <el-alert v-if="houses.length === 0 && !loading" title="No results found" type="info" show-icon></el-alert>
        </el-main>
    </el-container>
</div>
</body>
</html>
