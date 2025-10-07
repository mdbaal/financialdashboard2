import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:28
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
* @see app/Http/Controllers/AccountController.php:28
* @route '/dashboard/accounts'
*/
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:28
* @route '/dashboard/accounts'
*/
store.put = (options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: store.url(options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:28
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
* @see app/Http/Controllers/AccountController.php:28
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

/**
* @see \App\Http\Controllers\AccountController::destroy
* @see app/Http/Controllers/AccountController.php:43
* @route '/dashboard/accounts'
*/
export const destroy = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/dashboard/accounts',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\AccountController::destroy
* @see app/Http/Controllers/AccountController.php:43
* @route '/dashboard/accounts'
*/
destroy.url = (options?: RouteQueryOptions) => {
    return destroy.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AccountController::destroy
* @see app/Http/Controllers/AccountController.php:43
* @route '/dashboard/accounts'
*/
destroy.delete = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(options),
    method: 'delete',
})

/**
* @see \App\Http\Controllers\AccountController::destroy
* @see app/Http/Controllers/AccountController.php:43
* @route '/dashboard/accounts'
*/
const destroyForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
* @see \App\Http\Controllers\AccountController::destroy
* @see app/Http/Controllers/AccountController.php:43
* @route '/dashboard/accounts'
*/
destroyForm.delete = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

destroy.form = destroyForm

const accounts = {
    store: Object.assign(store, store),
    destroy: Object.assign(destroy, destroy),
}

export default accounts