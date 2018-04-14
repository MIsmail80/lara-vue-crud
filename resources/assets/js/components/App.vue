<template>
    <div id="app">
        <div class="heading">
            <h1>Icons</h1>
        </div>
        <icon-card-component
                v-for="icon in icons"
                v-bind="icon"
                :key="icon.id"
                @update="update"
                @delete="del"
        ></icon-card-component>
        <div>
            <button @click="create()">Add</button>
        </div>
    </div>
</template>
<script>
    function Icon({id, name, color}) {
        this.id = id;
        this.name = name;
        this.color = color;
    }

    import IconCardComponent from './IconCardComponent.vue';

    export default {
        data() {
            return {
                icons: []
            }
        },
        created() {
            this.read();
        },
        methods: {
            create() {
                window.axios.post('/api/icons').then(({data}) => {
                    this.icons.push(new Icon(data));
                });
            },
            read() {
                window.axios.get('/api/icons').then(({data}) => {
                    data.forEach(icon => {
                        this.icons.push(new Icon(icon));
                    });
                });
            },
            update(id, color) {
                window.axios.put(`/api/icons/${id}`, {color}).then(() => {
                    // Once AJAX resolves we can update the Icon with the new color
                    this.icons.find(icon => icon.id === id).color = color;
                });
            },
            del(id) {
                window.axios.delete(`/api/icons/${id}`).then(() => {
                    let index = this.icons.findIndex(icon => icon.id === id);
                    this.icons.splice(index, 1);
                });
            }
        },
        components: {
            IconCardComponent
        }
    }
</script>
