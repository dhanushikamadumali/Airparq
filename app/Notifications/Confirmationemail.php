<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Confirmationemail extends Notification
{
    use Queueable;

    public $data;
    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Hello '.$this->data['first_name'])
                    ->subject('Booking Confirmation')
                    ->line('Congratulations!')
                    ->line('Here are the details of booking:')
                    ->line('Name: '.$this->data['first_name'].' '.$this->data['last_name'])
                    ->line('Booking Code: '.$this->data['booking_code'])
                    ->line('Amount: £ '.$this->data['totalAmount'])
                    ->line('Parking From Date :'.$this->data['parking_from_date'] )
                    ->line('Parking Till Date :'.$this->data['parking_till_date'])
                    ->line('Vehicle Reg No:'.$this->data['vehicle_reg'])
                    ->line('terminal : '.$this->data['inbound_terminal_name'])
                    ->line('Prices exclude airport access fees.Customer/owner has to bear the cost of paying the ULEZ if the vehicle does not meet the ULEZ standards. The customer has to pay ULEZ for both days (the day of dropoff and the day of collection)')
                    ->line('Beginning on August 29, 2023, the Ultra Low Emission Zone (ULEZ) in London has been extended to cover the entire Greater London area, Heathrow Airport included.This expansion, executed by Transport for London (TfL), seeks to mitigate air pollution across the city. As of this date, Heathrow Airport and its terminals (2, 3, 4, and 5) fall within the boundaries of ULEZ. Consequently, vehicles entering the airport are required to comply with specific emission criteria to avoid incurring a daily fee.To check if your car is ULEZ complaint please visit: https://tfl.gov.uk/modes/driving/check-your-vehicle/Please be aware that if your vehicle does not meet ULEZ compliance standards, you will be responsible for paying the daily charge on both the day of drop-off and pick-up. To pay this, please visit: https://tfl.gov.uk/modes/driving/pay-to-drive-in-london Once your holiday parking has been booked and confirmed via email you are ready to go. Please do call us on +44 7464 777258 or +44 7301 330702 when you are 30 minutes away so we can allocate a driver to collect your car. We have a designated AIRPARQ Parking desk located in the short stay car park with our friendly chauffeurs waiting to accept your car. Please note, if the phone lines are busy, make your way to our desk where our staff will meet you.')
                    ->line('Please see the directions for each Terminal we serve below.')
                    ->line('Terminal 2 - sat-nav postcode: TW6 1EW')
                    ->line(' Terminal 2 - Departure Instructions')
                    ->line(' From the M25 exit at Junction 15, follow the signs for Terminals 1, 2 & 3 all the way round following onto the Western Perimeter Road:
                            Go through the main tunnel to the Central Terminal Area for Terminals 1, 2 & 3.')
                    ->line(' Exiting the tunnel, keep right, passing the Central Bus Station, joining the final approaches to Terminal 2 on Cosmopolitan Way.
                            Please keep to the right, as the road to Terminal 2 will move away from building before turning back as the road ramps up to Terminal 2 Departures & the Short Stay 2 car park on Constellation Way.
                            Once you are on the rising ramp, continue to keep right as the ramp will lead directly into the "Short stay car park" entry barriers.')
                    ->line(' Please make sure you are in lane 5 or 6, (towards the ticket machine), which will take you to Level 4 of the Short Stay car park.
                            Take a ticket at the barrier and enter the carp ark.')
                    ->line(' Once you enter the car park on Level 4, keep to the RIGHT following the signs for "Off Airport Parking Meet & Greet" and then please park your car in "Row B".
                            Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.
                            Terminal 2 Return Instructions')
                    ->line(' On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
                        Make your way to the same place where you dropped the vehicle off, (Level 4 of the Short Stay car park) and your car will be ready and waiting for you in Row B next to the lift/pay machine')
                    ->line('Terminal 3 - sat-nav postcode: TW6 1QG')
                    ->line('Terminal 3 - Departure Instructions')
                    ->line('  From the M25 exit at Junction 15, follow the signs for Terminals 1, 2 & 3 all the way round following onto the Western Perimeter Road.
                            Go through the main tunnel to the Central Terminal Area for Terminals 1, 2 & 3.
                            Exiting the tunnel, keep in the 1st lane and follow signs for Terminal 3 Short Stay Carpark (Carpark 3).
                            Take a ticket from the barrier and follow signs to Level 4, then please park your car in "Row A"
                            Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.
                            Terminal 3 Return Instructions')
                    ->line('On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
                        As you arrive in the arrivals, just before the Exit door on the Right Hand Side, please take the lift to Level 4 Short Stay Car Park and your car will be ready and waiting for you in ROW A.')
                    ->line('Terminal 4 - sat-nav postcode: TW6 3XA')
                    ->line('Terminal 4 - Departure Instructions')
                    ->line('Please follow directions to the Short Stay car park and then drive up to Level 2, Row F. Look for the "Off Airport Meet and Greet" sign, our desk is located in the lobby.')
                    ->line('Please follow directions to the Short Stay car park and then drive up to Level 2, Row F. Look for the "Off Airport Meet and Greet" sign, our desk is located in the lobby.')
                    ->line(' Please have your email booking confirmation ready, together with your return flight details.')
                    ->line("From our desk it's just a short walk to the terminal.")
                    ->line('Terminal 4 Return Instructions')
                    ->line('On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.Walk back to the Short Stay car park (Level 2, Row R) where your car will be ready and waiting for you.')
                    ->line('Terminal 5 - sat-nav postcode: TW6 2GA')
                    ->line('Terminal 5 - Departure Instructions')
                    ->line('Please follow the signs for the "Short Stay car park", which is located on the right hand side of the ramp, as you take the exit for Terminal 5 from the roundabout.
                    On arrival at the Short Stay car park, please move to the left hand lane, following directions to "LEVEL 4".
                    Take a ticket from the barrier and make your way to Zones "R-S". Please park your car in these designated areas, sign posted as "Off Airport Meet & Greet"
                    Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.')
                    ->line(' Terminal 5 Return Instructions')
                    ->line('On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
                    Make your way to where you dropped the car off, (Level 4, Short Stay car park), where your car will be ready and waiting for you in Row R OR S.')
                    ->line('If you did not request this verification, please ignore this email.');

                }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
