import { createApp } from 'vue/dist/vue.esm-bundler';
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
import axios from 'axios';

const app = createApp({
    data() {
        return {
            searchForm: {
                name: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: '',
                price_min: '',
                price_max: '',
            },
            houses: [],
            loading: false,
        };
    },
    methods: {
        async searchHouses() {
            this.loading = true;
            try {
                const response = await axios.get('/api/houses/search', {
                    params: this.searchForm,
                });
                this.houses = response.data.houses;
            } catch (error) {
                console.error('Error fetching houses:', error);
                this.houses = [];
            } finally {
                this.loading = false;
            }
        },
    },
});

app.use(ElementPlus);
app.mount('#app');
