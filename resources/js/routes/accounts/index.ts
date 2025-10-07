import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts'
*/
export const store = (options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: store.url(options),
    method: 'put',
})

store.definition = {
    methods: ["put"],
    url: '/dashboard/accounts',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts'
*/
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts'
*/
store.put = (options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: store.url(options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts'
*/
const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: store.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PUT',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts'
*/
storeForm.put = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: store.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PUT',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

store.form = storeForm

const accounts = {
    store: Object.assign(store, store),
}

export default accounts