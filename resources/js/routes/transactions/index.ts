import {
    applyUrlDefaults,
    queryParams,
    type RouteDefinition,
    type RouteFormDefinition,
    type RouteQueryOptions
} from './../../wayfinder'

/**
 * @see \App\Http\Controllers\TransactionController::store
 * @see app/Http/Controllers/TransactionController.php:13
 * @route '/dashboard/transactions'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: store.url(options),
    method: 'put',
})

store.definition = {
    methods: ["put"],
    url: '/dashboard/transactions',
} satisfies RouteDefinition<["put"]>

/**
 * @see \App\Http\Controllers\TransactionController::store
 * @see app/Http/Controllers/TransactionController.php:13
 * @route '/dashboard/transactions'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
 * @see \App\Http\Controllers\TransactionController::store
 * @see app/Http/Controllers/TransactionController.php:13
 * @route '/dashboard/transactions'
 */
store.put = (options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: store.url(options),
    method: 'put',
})

/**
 * @see \App\Http\Controllers\TransactionController::store
 * @see app/Http/Controllers/TransactionController.php:13
 * @route '/dashboard/transactions'
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
 * @see \App\Http\Controllers\TransactionController::store
 * @see app/Http/Controllers/TransactionController.php:13
 * @route '/dashboard/transactions'
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
 * @see \App\Http\Controllers\TransactionController::update
 * @see app/Http/Controllers/TransactionController.php:30
 * @route '/dashboard/transactions/{transaction}'
 */
export const update = (args: {
    transaction: string | number
} | [transaction: string | number] | string | number, options?: RouteQueryOptions): RouteDefinition<'patch'> => ({
    url: update.url(args, options),
    method: 'patch',
})

update.definition = {
    methods: ["patch"],
    url: '/dashboard/transactions/{transaction}',
} satisfies RouteDefinition<["patch"]>

/**
 * @see \App\Http\Controllers\TransactionController::update
 * @see app/Http/Controllers/TransactionController.php:30
 * @route '/dashboard/transactions/{transaction}'
 */
update.url = (args: {
    transaction: string | number
} | [transaction: string | number] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = {transaction: args}
    }

    if (Array.isArray(args)) {
        args = {
            transaction: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        transaction: args.transaction,
    }

    return update.definition.url
        .replace('{transaction}', parsedArgs.transaction.toString())
        .replace(/\/+$/, '') + queryParams(options)
}

/**
 * @see \App\Http\Controllers\TransactionController::update
 * @see app/Http/Controllers/TransactionController.php:30
 * @route '/dashboard/transactions/{transaction}'
 */
update.patch = (args: {
    transaction: string | number
} | [transaction: string | number] | string | number, options?: RouteQueryOptions): RouteDefinition<'patch'> => ({
    url: update.url(args, options),
    method: 'patch',
})

/**
 * @see \App\Http\Controllers\TransactionController::update
 * @see app/Http/Controllers/TransactionController.php:30
 * @route '/dashboard/transactions/{transaction}'
 */
const updateForm = (args: {
    transaction: string | number
} | [transaction: string | number] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PATCH',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
 * @see \App\Http\Controllers\TransactionController::update
 * @see app/Http/Controllers/TransactionController.php:30
 * @route '/dashboard/transactions/{transaction}'
 */
updateForm.patch = (args: {
    transaction: string | number
} | [transaction: string | number] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PATCH',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

update.form = updateForm

/**
 * @see \App\Http\Controllers\TransactionController::destroy
 * @see app/Http/Controllers/TransactionController.php:47
 * @route '/dashboard/transactions'
 */
export const destroy = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/dashboard/transactions',
} satisfies RouteDefinition<["delete"]>

/**
 * @see \App\Http\Controllers\TransactionController::destroy
 * @see app/Http/Controllers/TransactionController.php:47
 * @route '/dashboard/transactions'
 */
destroy.url = (options?: RouteQueryOptions) => {
    return destroy.definition.url + queryParams(options)
}

/**
 * @see \App\Http\Controllers\TransactionController::destroy
 * @see app/Http/Controllers/TransactionController.php:47
 * @route '/dashboard/transactions'
 */
destroy.delete = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(options),
    method: 'delete',
})

/**
 * @see \App\Http\Controllers\TransactionController::destroy
 * @see app/Http/Controllers/TransactionController.php:47
 * @route '/dashboard/transactions'
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
 * @see \App\Http\Controllers\TransactionController::destroy
 * @see app/Http/Controllers/TransactionController.php:47
 * @route '/dashboard/transactions'
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

const transactions = {
    store: Object.assign(store, store),
    update: Object.assign(update, update),
    destroy: Object.assign(destroy, destroy),
}

export default transactions