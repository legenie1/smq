#include <sys/types.h>
#include <signal.h>
#include <assert.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
 
int main(int argc, char *argv[]) {
    pid_t fils;
    assert(argc == 1);
    fils = fork();
    switch(fils) {
        // Erreur fork
        case -1:
            perror("fork");
        break;
        // Action fils
        case 0:
            printf("Je suis le fils %d, mon père est %d\n", getpid(), getppid());
        break;
        // Action père
        default:
            printf("Je suis le père %d\n", getpid());
            sleep(1); // On laisse au fils le temps de s'exécuter
            kill(fils, SIGUSR1); // On tue le fils
            printf("Je suis le pere, je meurs\n");
            exit(EXIT_SUCCESS);
    }
    return 0; 
    }

    int code_retour ; code_retour  = fork (); 
    switch (code_retour ) {  
        // lors de la création du processus  
        case –1 :  printf (“Pbm lors de la creation du processus\n”);  
        break;   
        // processus fils
        case 0  :  printf (“Je suis le processus fils \n”);  
        break; 
        // processus père   
        default :  printf (“Je suis le processus père\n”);           
        printf (“Je viens de créer le processus fils dont le pid est %d \n”,code_retour); 
        break; 
     }