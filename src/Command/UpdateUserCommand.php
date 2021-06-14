<?php

namespace App\Command;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\Table;

/**
 * Class UpdateUserCommand
 * @package App\Command
 * @property EntityManagerInterface entityManagerInterface
 * @property UserRepository\ userRepository
 */
class UpdateUserCommand extends Command
{

    protected static $defaultName = 'update-user';
    protected static $defaultDescription = 'Add a short description for your command';

    /**
     * UpdateUserCommand constructor.
     * @param EntityManagerInterface $entityManager
     * @param UserRepository $userRepository
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        UserRepository $userRepository
    )
    {
        parent::__construct();
        $this->entityManagerInterface = $entityManager;
        $this->userRepository = $userRepository;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('user_id', InputArgument::OPTIONAL, 'User id to find the user.')
            ->addArgument('user_role', InputArgument::OPTIONAL, 'User role.');
    }

    protected function execute(InputInterface $input, OutputInterface $output):int
    {
        $io = new SymfonyStyle($input, $output);
        // table to list user
        $output->writeln("Enter the user id from the table and user role as like ROLE_ADMIN or ROLE_USER otherwise it will not acceptable\nwrite command e.g: bin/console update-user 1 ROLE_USER");
        $users = $this->userRepository->findAll();
        $table = new Table($output);
        if($users){
            foreach ($users as $user) {
                $roles=$user->getRoles();
                $table
                    ->setHeaders(['id', 'email', 'roles'])
                    ->setRows([
                        [$user->getId(), $user->getEmail(),$roles[0] ]
                    ]);
                $table->render();
            }
        }
        else{
            $io->note('record now found');
        }
        //close
        $userId = $input->getArgument('user_id');
        $output->writeln('<info>   Write User role as like ROLE_ADMIN or ROLE_USER otherwise it will not acceptable</info>');
        $userRole = $input->getArgument('user_role');

        if($userRole==='ROLE_ADMIN' or $userRole=== 'ROLE_USER'){
            $user_table = $this->userRepository->findOneBy(["id"=>$userId]);
            $user_table->setRoles(array($userRole));
            $entityManager = $this->entityManagerInterface;
            $entityManager->flush();
            $io->success('success.');
        }
        else{
            $io->error('please write correct User role ,e.g ROLE_ADMIN,OR ROLE_USER');
        }
        return Command::SUCCESS;
    }
}