<script setup lang="ts">
import { dashboard, login, register } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';
import {Card, CardContent} from '@/components/ui/card/';
import Separator from '@/components/ui/separator/Separator.vue';
import {Stepper, StepperTitle, StepperDescription, StepperIndicator, StepperItem, StepperSeparator, StepperTrigger} from '@/components/ui/stepper/';
import Icon from '@/components/Icon.vue';
import { Code, User, Landmark, Linkedin, Github } from 'lucide-vue-next';



const projectSteps = [
    {
        step: 1,
        title: "De Basis",
        description: "Het kunnen bijhouden van rekeningen, transacties en categoriën en daar CRUD acties op kunnen uitvoeren. En op een dashboard grafieken kunnen inzien op basis van de rekeningen en transacties",
        icon: Code
    },
    {
        step: 2,
        title: "Rollen en Rechten",
        description: "Het toevoegen en beheer van rollen, rechten en verschillende soorten gebruikers.",
        icon: User
    },
    {
        step: 3,
        title: "Rekeningen importeren",
        description: "Het kunnen importeren van een echte rekening doormiddel van een CSV export van je bank. Zo begin je met acurate data en kan je snel inzien het het er voor staat.",
        icon: Landmark
    },
];

</script>

<template>
    <Head title="Financial Dashboard 2">

    </Head>
    <div
        class="flex min-h-screen flex-col items-center p-6 text-white lg:justify-center lg:p-8 bg-[#0a0a0a]"
    >
        <h1 class="text-3xl font-bold text-white mb-2">Financial Dashboard 2</h1>
        <Card class="w-1/2">
            <CardContent >
            <div class="space-y-2">
                <p>
                Dit is een project om Laravel en Vue te leren en om een platform te maken waar in ik makkelijk op mijn eigen manier mijn financiën kan bijhouden.
                Voor dit project maak ik gebruik van Laravel 12 en de Vue starterkit, <Link class="font-bold underline" href="https://github.com/mdbaal/financialdashboard2">github</Link> voor versie beheer en
                Jira voor het bijhouden van de taken in een kanbanbord.
            </p>

            <p>
                Het doel van dit project is om te leren werken met Vue en verder te leren met Laravel en de backend kant van het framework.
                Verder is dit een showcase project voor op github en <Link class="font-bold underline" href="https://github.com/mdbaal/financialdashboard2">github</Link> natuurlijk wil ik er zelf gebruik van gaan maken.    
            </p>

            <p>De Vue starterkit maakt gebruik van InertiaJS, Wayfinder, Lucide icons en de Shadcn-Vue UI library.</p>
            </div>
            <Separator class="mt-5"></Separator>
            <h2 class="text-2xl font-bold text-white text-center my-2">Het project</h2>
            <Stepper :default-value="1">
                <StepperItem 
                    v-for="item in projectSteps"
                    :key="item.step"
                    class="basis-1/3"
                    :step="item.step"
                >
                <div class="text-center">
                    <StepperIndicator>
                        <component :is="item.icon"/>
                    </StepperIndicator>
                    <div class="flex flex-col">
                        <StepperTitle>
                            {{ item.title  }}
                        </StepperTitle>
                        <StepperDescription>
                            {{ item.description }}
                        </StepperDescription>
                    </div>
                    </div>
                    <StepperSeparator
                        v-if="item.step !== projectSteps[projectSteps.length-1].step"
                    />
                </StepperItem>
            </Stepper>
            <div class="flex justify-center mt-5" >
                <Link 
                    :href="dashboard()"
                    v-if="$page.props.auth.user"
                    class="border rounded p-2 bg-white/10 shadow"
                >
                    Dashboard
                </Link>
                <div class="flex justify-center gap-5" v-else>
                    <Link 
                        :href="login()"
                        class="border rounded p-2 bg-white/10 shadow"
                    >
                        Log In
                    </Link>
                    <Link 
                        :href="register()"
                        class="border rounded p-2 bg-white/10 shadow"
                    >
                        Register
                    </Link>
                </div>
            </div>
            </CardContent>
        </Card>


        <div class="mt-2 flex gap-5 justify-center">
            <Link href="https://github.com/mdbaal/financialdashboard2"><Github/></Link>
            <Link href="https://www.linkedin.com/in/mircobaalmans/"><Linkedin/></Link>
        </div>
    </div>
    
</template>
