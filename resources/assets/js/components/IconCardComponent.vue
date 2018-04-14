<template>
    <div class="col-4">
        <div class="icon-card card" style="width: 18rem;">
            <div class="card-header">
                <h5 class="card-title">{{ name | properCase }}</h5>
            </div>
            <div class="card-body text-center">
                <h6 class="card-subtitle mb-2 text-muted">
                    <i :class="fa_class" :style="styleColor"></i>
                </h6>
                <p class="card-text">
                    <select @change="update">
                        <option value="">Change Color</option>
                        <option
                                v-for="col in [ 'red', 'green' ]"
                                :value="col"
                                :key="col"
                                :selected="col === color ? 'selected' : ''"
                        >{{ col | properCase }}
                        </option>
                    </select>
                </p>
                <button @click="del" class="btn btn-primary">Delete</button>
            </div>
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
