<template>
    <div class="icon-card">
        <div class="col-1">
            <i :class="fa_class" :style="styleColor"></i>
        </div>
        <div class="col-2">
            <h3>Name: {{ name | properCase }}</h3>
            <select @change="update">
                <option
                        v-for="col in [ 'red', 'green' ]"
                        :value="col"
                        :key="col"
                        :selected="col === color ? 'selected' : ''"
                >{{ col | properCase }}
                </option>
            </select>
            <button @click="del">Delete</button>
        </div>
    </div>
</template>
<script>
    export default {
        computed: {
            fa_class() {
                return `fa ${this.name}`;
            },
            styleColor() {
                return `color: ${this.color}`;
            }
        },
        methods: {
            update(val) {
                this.$emit('update', this.id, val.target.selectedOptions[0].value);
            },
            del() {
                this.$emit('delete', this.id);
            }
        },
        props: ['id', 'name', 'color'],
        filters: {
            properCase(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        }
    }
</script>
<style>
</style>
