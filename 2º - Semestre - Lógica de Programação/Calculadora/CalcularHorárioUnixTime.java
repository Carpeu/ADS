package calcularhoráriounixtime;


public class CalcularHorárioUnixTime {
/* Unix Time (Hora Unix) é uma representação de data e hora amplamente usada em computação. 
    Ele mede o tempo pelo número de segundos decorridos desde 00:00:00 UTC(meridiano de greenwich) em 1º de janeiro de 1970, 
    o início da era do Unix , menos os ajustes feitos devido aos segundos bissextos .  */
    
    public static void main(String[] args) {
   
    long totalMilisegundos = System.currentTimeMillis() - 10800000; 
    /* 10800000 O valor de conversão de 3 (em relação ao meridiano de greenwich para o Brasil) horas em milissegundos */
 
    long totalSegundos = totalMilisegundos / 1000;
    long segundoAtual = totalSegundos % 60;
 
    long totalMinutos = totalSegundos / 60;
    long minutoAtual = totalMinutos % 60;
 
    long totalHora = totalMinutos / 60;
    long horaAtual = (totalHora % 24) - 3; 
    /* - 3 em relação o meridiano de greenwich */
 
    System.out.println(horaAtual + ":" + minutoAtual + ":" + segundoAtual);
 
 }
}
