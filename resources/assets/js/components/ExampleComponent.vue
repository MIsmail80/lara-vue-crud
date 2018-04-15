<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <h1>Hello from Example Component!!!</h1>
                        <p>
                            Feature branches (or sometimes called topic branches) are used to develop new features for
                            the upcoming or a distant future release. When starting development of a feature, the target
                            release in which this feature will be incorporated may well be unknown at that point. The
                            essence of a feature branch is that it exists as long as the feature is in development, but
                            will eventually be merged back into develop (to definitely add the new feature to the
                            upcoming release) or discarded (in case of a disappointing experiment).
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
