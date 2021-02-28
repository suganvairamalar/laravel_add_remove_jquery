           <?php $i=0; ?>
            @foreach($voters as $voter)
            <?php $i++; ?>
            <tr>
              <td class="table-text">{{ $i }}</td>
             <!--  <td class="table-text">{{ $voter->id }}</td> --> <!-- style='visibility: collapse;' -->
              <td class="table-text">{{ $voter->id}}</td>              
              <td class="table-text">{{ $voter->name }}</td>              
              <td class="table-text">{{ $voter->gender }}</td>              
              <td class="table-text">{{ $voter->dob }}</td>              
              <td class="table-text">{{ $voter->voter_id }}</td>              
              <td class="table-text">{{ $voter->mobile }}</td>              
              <td class="table-text">{{ $voter->address }}</td>              
              <td class="table-text">{{ $voter->city }}</td>              
              <td class="table-text">{{ $voter->postcode }}</td>              
            </tr>           
             @endforeach
              <tr>
              <td colspan="10" align="center">{!!$voters->render()!!}</td>
            </tr>
          
           
             
           