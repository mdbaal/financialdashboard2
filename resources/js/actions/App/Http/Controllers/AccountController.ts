import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\AccountController::index
* @see app/Http/Controllers/AccountController.php:16
* @route '/dashboard/accounts'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/dashboard/accounts',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AccountController::index
* @see app/Http/Controllers/AccountController.php:16
* @route '/dashboard/accounts'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AccountController::index
* @see app/Http/Controllers/AccountController.php:16
* @route '/dashboard/accounts'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\AccountController::index
* @see app/Http/Controllers/AccountController.php:16
* @route '/dashboard/accounts'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\AccountController::index
* @see app/Http/Controllers/AccountController.php:16
* @route '/dashboard/accounts'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\AccountController::index
* @see app/Http/Controllers/AccountController.php:16
* @route '/dashboard/accounts'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\AccountController::index
* @see app/Http/Controllers/AccountController.php:16
* @route '/dashboard/accounts'
*/
indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

index.form = indexForm

/**
* @see \App\Http\Controllers\AccountController::show
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts/{id}'
*/
export const show = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/dashboard/accounts/{id}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AccountController::show
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts/{id}'
*/
show.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { id: args }
    }

    if (Array.isArray(args)) {
        args = {
            id: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        id: args.id,
    }

    return show.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\AccountController::show
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts/{id}'
*/
show.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\AccountController::show
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts/{id}'
*/
show.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\AccountController::show
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts/{id}'
*/
const showForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: show.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\AccountController::show
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts/{id}'
*/
showForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: show.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\AccountController::show
* @see app/Http/Controllers/AccountController.php:27
* @route '/dashboard/accounts/{id}'
*/
showForm.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: show.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

show.form = showForm

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:40
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
* @see app/Http/Controllers/AccountController.php:40
* @route '/dashboard/accounts'
*/
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:40
* @route '/dashboard/accounts'
*/
store.put = (options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: store.url(options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\AccountController::store
* @see app/Http/Controllers/AccountController.php:40
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
* @see app/Http/Controllers/AccountController.php:40
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
* @see app/Http/Controllers/AccountController.php:55
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
* @see app/Http/Controllers/AccountController.php:55
* @route '/dashboard/accounts'
*/
destroy.url = (options?: RouteQueryOptions) => {
    return destroy.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AccountController::destroy
* @see app/Http/Controllers/AccountController.php:55
* @route '/dashboard/accounts'
*/
destroy.delete = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(options),
    method: 'delete',
})

/**
* @see \App\Http\Controllers\AccountController::destroy
* @see app/Http/Controllers/AccountController.php:55
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
* @see app/Http/Controllers/AccountController.php:55
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

const AccountController = { index, show, store, destroy }

export default AccountController